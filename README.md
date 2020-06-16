# Mint for Laravel 7+

A collection of traits, macros and other helpers to keep your Laravel app feeling fresh.

Here are just a few examples:

### SavesQuietly

Save a model "quietly" without broadcasting any events or firing off any observers.

```php
use Yab\Mint\Traits\SavesQuietly;

class Example extends Model 
{
    use SavesQuietly;
}
```
```php
$example->saveQuietly();
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

### WithoutEvents

When writing tests using the factory helper, sometimes it is desirable not to trigger any observer logic.

This package includes a built-in macro which helps with this:

```php
/** @test */
public function factory_events_can_be_disabled_on_demand()
{
    $example = factory(Example::class)->withoutEvents()->create();
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
