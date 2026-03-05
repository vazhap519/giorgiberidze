<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Permission;

class PermissionGeneratorSeeder extends Seeder
{
    public function run(): void
    {
        $resourcesPath = app_path('Filament/Resources');

        $files = File::allFiles($resourcesPath);

        foreach ($files as $file) {

            if (!str_contains($file->getFilename(), 'Resource.php')) {
                continue;
            }

            $resourceName = str_replace('Resource.php', '', $file->getFilename());
            $resourceName = strtolower($resourceName);

            $permissions = [
                "$resourceName.view",
                "$resourceName.create",
                "$resourceName.edit",
                "$resourceName.delete",
            ];

            foreach ($permissions as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission
                ]);
            }
        }
    }
}
