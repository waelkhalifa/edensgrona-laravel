#!/bin/bash

# Create SocialLink pages
mkdir -p app/Filament/Resources/SocialLinkResource/Pages
cat > app/Filament/Resources/SocialLinkResource/Pages/ListSocialLinks.php << 'EOF'
<?php
namespace App\Filament\Resources\SocialLinkResource\Pages;
use App\Filament\Resources\SocialLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialLinks extends ListRecords
{
    protected static string $resource = SocialLinkResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\CreateAction::make()];
    }
}
EOF

cat > app/Filament/Resources/SocialLinkResource/Pages/CreateSocialLink.php << 'EOF'
<?php
namespace App\Filament\Resources\SocialLinkResource\Pages;
use App\Filament\Resources\SocialLinkResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialLink extends CreateRecord
{
    protected static string $resource = SocialLinkResource::class;
}
EOF

cat > app/Filament/Resources/SocialLinkResource/Pages/EditSocialLink.php << 'EOF'
<?php
namespace App\Filament\Resources\SocialLinkResource\Pages;
use App\Filament\Resources\SocialLinkResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialLink extends EditRecord
{
    protected static string $resource = SocialLinkResource::class;
    protected function getHeaderActions(): array
    {
        return [Actions\DeleteAction::make()];
    }
}
EOF

echo "Filament pages created successfully"
