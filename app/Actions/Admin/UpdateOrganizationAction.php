<?php

namespace App\Actions\Admin;

use App\Models\Organization;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateOrganizationRequest;

class UpdateOrganizationAction
{
    private $organization;

    public function handle(UpdateOrganizationRequest $request)
    {
        $validated = $request->validated();
        $this->organization = Organization::find($request->id);

        if ($request->file('organization_image')) :
            $image = $this->saveImage($request->file('organization_image'));
            $validated['organization_image'] = $image;
        endif;

        $this->organization->update($validated);
    }

    private function saveImage($file): string
    {
        if (File::exists("storage/" . $this->organization->organization_image)) :
            File::delete("storage/" . $this->organization->organization_image);
        endif;

        $fileName = now()->timestamp . '.' . $file->extension();
        $filePath = "organization/" . $fileName;

        $file->storeAs('organization', $fileName);

        return $filePath;
    }
}
