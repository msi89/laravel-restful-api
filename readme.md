

# Api docs

```bash
# generate datas for development
php artisan db:seed
# or 
php artisan db:seed --class=ArticlesTableSeeder

# execute migrations
php artisan migrate

# Generate keys
php artisan passport:install

# Publish the cors
php artisan vendor:publish --provider="Barryvdh\Cors\ServiceProvider"

# 1) OauthLogin: method:POST, URL:http://localhost:8000/oauth/token
{
 username: 'fgf@hgg.fgf'
 password: '125'
 grant_type:'password'
 client_id: 2
 client_secret: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI3Mz'
}
# 1.2 Login: method:POST,  URL:http://localhost:8000/api/auth/register
{
 email: 'fgf@hgg.fgf'
 password: '125'
}
# 2) Register: method:POST, URL:http://localhost:8000/api/auth/register
{
 name: 'fgf'
 email: 'fgf@hgg.fgf'
 password: '125',
 confirm_password: '125',
}

## --- for others ---

headers: {
  Accept:'application/json',
  Authorization: 'Bearer {accessToken}',
}

# 3) List: method:GET, URL:http://localhost:8000/api/products

# 4) Create: method:POST, URL:http://localhost:8000/api/products

# 5) Show: method:GET, URL:http://localhost:8000/api/products/{id}

# 6) Update: method:PUT, URL:http://localhost:8000/api/products/{id}

# 7) Delete: method:DELETE, URL:http://localhost:8000/api/products/{id}

```