# MultiException library
## Example

```php
use Skiphog\MultiException;

///...

public function check($data)
{
    $multi = new MultiException();
    
    if() {
        
    }
    
    if() {}
    
    if($multi->isEmpty) {
        throw $errors;
    }
    
    return true;
}

///...
```