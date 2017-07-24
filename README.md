# hackish

This is the smallest (14 lines) full functional PHP framework with following features:

## Safe and protected template system

```html
<div>{name}<div>
```
```php
render('name',['name'=>'Abby']);
```

## Database wrapper with error handling

```php
$a = dbAr("SELECT * FROM test"); //output an assoc array
```

## Full functional router

```php
$routes['ALL']['/^\/blog\/(\w+)\/(\d+)\/?$/'] = function($category, $id){
    print "category={$category}, id={$id}";
};
$routes['GET']['/^\/blog\/(\w+)\/(\d+)\/?$/'] = function($category, $id){
    print "category={$category}, id={$id}";
};
```

## Migration (to-do)
