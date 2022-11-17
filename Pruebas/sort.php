
<?php

$names = array('Amin', 'amir', 'sarah', 'Somayeh', 'armita', 'Armin');

//Hay que tener cuidado porque la comparación se hace
//con valores ASCII (recordemos que se diferencian mayúsculas
//y minúsculas)
sort($names); // simple alphabetical sort
print_r($names);

//Si quieres ordenarlo alfabéticamente independientemente
//de mayúsculas y minúsculas
sort($names, SORT_STRING | SORT_FLAG_CASE);
print_r($names);

?>