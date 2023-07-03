# Meena fiber glass

## Netkathir PHP framework documentation

### DB utilities

```
  select key value as array file refer: lib\util\DBUTIL.php
    
    @param mixed $table_name
    @param mixed $key => array key column 
    @param mixed $val => array value column  
    @param mixed $whereKEY => SQL where condition column
    @param mixed $whereVAL => where condition value
    @return mixed (false or data = [key1=>val1,key2=>val2])

  Example 
    include_once 'util/DBUTIL.php';
    $dbutil = new DBUTIL($crg);  
    $data = $dbutil->selectKeyVal('paymentmode','ID','Paymode');
    $data = $dbutil->selectKeyVal('usertype') //here only table name used key and val are default values and no where condition
```
