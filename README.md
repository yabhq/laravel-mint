[![Latest Version on Packagist](https://img.shields.io/packagist/v/yabhq/laravel-mint.svg?style=flat-square)](https://packagist.org/packages/yabhq/laravel-mint)
[![CircleCI](https://img.shields.io/circleci/project/github/yabhq/laravel-mint/master.svg)](https://circleci.com/gh/yabhq/laravel-mint)

# Mint for Laravel 8+

A collection of traits, macros and other helpers to keep your Laravel app feeling fresh.

### Installation

```
composer require yabhq/laravel-mint
```

### Archivable

Allow for models to be archived or unarchived based on an "archived_at" field on the database table. A global scope automatically excludes archived records when querying your model.

```php
use Yab\Mint\Traits\Archivable;

class Example extends Model
{
    use Archivable;
}
```

```php
$example->archive();
$example->unarchive();

Example::query(); // Will exclude archived items...
Example::withArchived(); // With archived items included...
```

### Immutable

Models which are marked as "immutable" will throw an ImmutableDataException if updated or deleted (but not created).

```php
use Yab\Mint\Traits\Immutable;

class Example extends Model
{
    use Immutable;
}
```

```php
// No problem
$example = Example::create([
    'field' => 'value'
]);

// Throws an exception...
$example->update([
    'field' => 'updated'
]);
```

You can also customize the conditions under which a model is immutable by overriding the isImmutable() function on your model:

```php
public function isImmutable()
{
    return $this->status === 'closed';
}
```

### UUID Models

Easily use UUIDs for your model's primary key by leveraging the UuidModel trait:

```php
use Yab\Mint\Traits\UuidModel;

class Example extends Model
{
    use UuidModel;
}
```

If you would like to customize the name of the UUID column, simply add the getUuidColumnName function in your model class:

```php
public static function getUuidColumnName(): string
{
    return 'my_column_name';
}
```

### Money Cast

A custom cast for storing monetary values as cents in the database while fetching them as decimal values.

```php
use Yab\Mint\Casts\Money;

class Example extends Model
{
    protected $casts = [
        'price' => Money::class,
    ];
}
```

### Slugify

Create slugs that are unique and never collide with each other.

```php
use Yab\Mint\Trails\Slugify;

class Example extends Model
{
    use Slugify
}
```

By default the Slugify trait uses the name property on your model. You can change this
by overriding the getSlugKeyName method on your model.

```php
public static function getSlugKeyName(): string
{
    return 'title';
}
```

### Avatars

The HasAvatar trait allows you to easily support avatars for your users. It even has a built-in Gravatar fallback!

```php
use Yab\Mint\Trails\HasAvatar;

class User extends Model
{
    use HasAvatar;
}
```

You can customize the database field used to retrieve the profile images:

```php
public function getAvatarField() : string
{
    return 'profile_picture';
}
```

It is also possible to determine which field is used for the Gravatar email address:

```php
public function getEmailField(): string
{
    return 'email';
}
```
