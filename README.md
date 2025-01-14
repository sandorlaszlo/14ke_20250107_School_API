**Backend**:
`php artisan install:api`
- routes/api.php -> minden route prefixelődik egy `api` előtaggal.
- Sanctum (hitelesítés)

Student model:
` php artisan make:model Student -cmRf --api`

Migráció újra:
`php artisan migrate:fresh --seed`

Resource:
`php artisan make:resource StudentResource`