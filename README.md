```bash
# Publish the config jwt
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

# Generate jwt secret key
php artisan jwt:secret