<?php
namespace App\Services;

use App\Helpers\Logger;
use App\Helpers\ResponseHelper;
use App\Models\Author;

class AuthorService
{
    public function createAuthor(array $data)
    {
        try {
            $author = Author::updateOrCreate(['user_id' => $data['user_id']],[
                'user_id' => $data['user_id'],
                'is_active' => $data['is_active'] ?? false,
            ]);

            if (!$author) {
                return ResponseHelper::sendError('Author not created!', [], 500);
            }

            return true;
        } catch (\Throwable $th) {
            Logger::Log($th);
            return ResponseHelper::sendError('Something went wrong!', $th->getMessage(), 500);
        }
    }
}