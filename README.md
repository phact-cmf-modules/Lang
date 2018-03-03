# Мультиязычность для TextField и CharField

## Краткое описание

Добавляет возможность описывать многоязычные поля CharField, TextField.

LangCharField, LangTextField являются виртуальными полями, которые в 
свою очередь создают реальные поля в модели с постфиксами вида 
"_ru", "_en", соответствующие языкам. Языки описываются для компонента.


## Пример использования

### Пример описания компонента

```php
'lang' => [
    'class' => \Modules\Lang\Components\Lang::class,
    'langs' => ['ru', 'en'],
    'primaryLang' => 'ru'
],
```

### Пример описания поля

```php
...
'name' => [
    'class' => LangCharField::class,
    'label' => 'Name',
    'primaryNull' => true,
    'secondaryNull' => true
],
...
```

### Перебрать все поля, созданные в модели

```php
$nameField = $model->getField('name');
foreach ($nameField->getFieldsNames() as $name) {
    $model->{$name} = "";
}
```

### Вывод в шаблоне / коде значения поля с текущим языком

