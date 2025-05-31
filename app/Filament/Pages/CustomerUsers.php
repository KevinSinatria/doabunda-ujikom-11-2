<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\HtmlString;

class CustomerUsers extends Page implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Manual Custom Pages';

    protected static string $view = 'filament.resources.customer-users.pages.customer-users';

    public function table(Table $table): Table
    {
        return $table
            ->selectable()
            ->query(User::query()->where('role', 'customer'))
            ->columns([
                TextColumn::make('username')->searchable()->toggleable(),
                TextColumn::make('email')->searchable()->toggleable(),
                TextColumn::make('role')->searchable()->toggleable(),
            ])
            ->headerActions([
                Action::make('create')
                    ->label('Create')
                    ->icon('heroicon-o-plus')
                    ->form([
                        TextInput::make('username')->label('Username')->required()->autocomplete(false)->minLength(8)->helperText(new HtmlString('<strong>Username</strong> minimal 8 karakter')),
                        TextInput::make('email')->label('Email')->required()->autocomplete(false)->email()->helperText(new HtmlString('Note: <strong>Password</strong> otomatis di set menjadi "password" karena fitur ini bertujuan hanya untuk testing.')),
                        Hidden::make('password')->default('password'),
                        Hidden::make('role')->default('customer'),
                    ])
                    ->action(function (array $data) {
                        $data['password'] = bcrypt($data['password']);

                        User::create($data);

                        Notification::make()
                            ->success()
                            ->title('Success')
                            ->body('Successfully created.')
                            ->send();
                    })
            ])
            ->actions([
                Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-o-pencil')
                    ->form([
                        TextInput::make('username')->label('Username')->required()->autocomplete(false)->minLength(8)->helperText(new HtmlString('<strong>Username</strong> minimal 8 karakter')),
                        TextInput::make('email')->label('Email')->required()->autocomplete(false)->email()->helperText(new HtmlString('Note: <strong>Password</strong> otomatis di set menjadi "password" karena fitur ini bertujuan hanya untuk testing.')),
                    ])
            ])
            ->bulkActions([
                BulkAction::make('delete')
                    ->requiresConfirmation()
                    ->action(fn(Collection $records) => $records->each->delete())
            ]);
    }
}
