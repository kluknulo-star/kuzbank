# KuzBank
KuzBank - банк выдающий вклады под индивидуальный процент складывающийся из суммы и бонусной системы пользователя

## Установка и настройка

```composer install```

```cp .env.example .env```

```php artisan key:generate```

```php artisan migrate --seed```

## Обзор + скриншоты

Есть 3 роли в системе
- Админ
- Менеджер
- Клиент

Пользователь создает вклад
Менеджер подтверждает/отклоняет заявку клинета на вклад
Админ назначает бонусные программы, ставки на вклады и изменяет данные менеджеров и клиентов (меняет отделения или роль)

### Данные для входа (логин и пароль одинаковы!!!)

Сайт:http://kluknulo.ru:8090/

Клиент логин:client@kuzbank.ru

Менеджер логин:worker@kuzbank.ru

Админ логин:admin@kuzbank.ru

### Обзор от админа
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/8c24707a-a3be-4aec-a02d-3c455c632b3a)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/3c46803f-fe28-44f9-83f1-45b14e63396f)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/c33c87b3-398f-4802-8166-95144bb2cf34)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/2a45e15b-7e05-4181-abda-09996b4f1694)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/5ca11901-863b-4430-9cce-45a15c64741a)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/f3846fb5-77f9-476b-adc4-3322e2e96724)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/cb628394-d31a-4bcc-b070-6ec44d42be51)

### Обзор от менеджера
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/ad2c477b-d69b-43b7-a5fb-cf79190db817)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/c081c3b0-7daf-4273-94ef-fd2a3c13f3a6)

### Обзор от клиента
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/b6daefaf-046b-4263-8024-c299c7b9fa58)
![image](https://github.com/kluknulo-star/kuzbank/assets/81085234/8adb97a5-765d-4b90-adb4-794df919bff9)



