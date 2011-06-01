<?php
include_once("../libs/database.lib.php");
$db = new pgDB();
$db->connect();
$db->transaction("
CREATE OR REPLACE FUNCTION controllaticket() RETURNS trigger AS \$controllaticket\$
begin
if (new.assegnato is null AND new.status <> 'nuovo')
then
raise exception 'A new ticket must have an ID associated';
end if;
if (new.datachiusura is null AND new.status ='risolto')
then
raise exception 'A closed ticket must have a closed date';
end if;
return new;
end;
\$controllaticket\$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION controllanotautente() RETURNS trigger AS \$controllanotautente\$
begin
if (new.id_creatore=new.id_destinatario)
then
raise exception 'No auto message';
end if;
return new;
end;
\$controllanotautente\$ LANGUAGE plpgsql;


CREATE TRIGGER controllaticket BEFORE INSERT OR UPDATE ON ticket
FOR EACH ROW EXECUTE PROCEDURE controllaticket();

CREATE TRIGGER controllanotautente BEFORE INSERT OR UPDATE ON notautente
FOR EACH ROW EXECUTE PROCEDURE controllanotautente();");
$db->close();
?>
