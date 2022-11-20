<?php

namespace Acitjazz\UploadEndpoint\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
   /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
   public function toArray($request)
   {
      return [
         'id' => $this->id,
         'name' => $this->name,
         'slug' => $this->slug,
         'original_name' => $this->original_name,
         'file_type' => $this->file_type,
         'public_id' => $this->public_id,
         'extension' => $this->extension,
         'size' => $this->size,
         'readable_size' => $this->readable_size,
         'height' => $this->height,
         'width' => $this->width,
         'path' => config('uploadendpoint.bucket_name').'/'.$this->url,
         'url' => $this->storage == 'local' ?  url('/media').'/'.config('uploadendpoint.bucket_name').'/'.$this->url : $this->url,
      ];
   }
}