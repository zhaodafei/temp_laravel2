### 说明

laravel 模板

### 启动

```
composer install  #安装vendor依赖包
```

### 自动生成model层

```
#model层生成
php artisan infyom:model 模型名称 --fromTabel --tableName=表名(需要表前缀)
php artisan infyom:model DicRegion --fromTable --tableName=jyt_dic_region
```

```html
D:\php\php7.2.9nts\php.exe artisan infyom:model 01select --fromTable --tableName=01select
D:\php\php7.2.9nts\php.exe artisan infyom:model 02judge --fromTable --tableName=02judge
D:\php\php7.2.9nts\php.exe artisan infyom:model 03blank --fromTable --tableName=03blank
D:\php\php7.2.9nts\php.exe artisan infyom:model 04answer --fromTable --tableName=04answer
```

