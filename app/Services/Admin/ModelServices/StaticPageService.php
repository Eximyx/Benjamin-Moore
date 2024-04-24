<?php

namespace App\Services\Admin\ModelServices;

use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\StaticPageRepository;
use DOMDocument;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StaticPageService extends BaseModelService
{
    public function __construct(StaticPageRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param Model $entity
     * @param ModelDTO $dto
     * @return Model
     */
    public function update(Model $entity, ModelDTO $dto): Model
    {
        $dto = $this->htmlParser($dto, $entity['id']);

        return parent::update($entity, $dto);
    }

    /**
     * @param ModelDTO $dto
     * @param int $id
     * @return ModelDTO
     */
    public function htmlParser(ModelDTO $dto, int $id): ModelDTO
    {
        $dom = new DOMDocument();
        $dom->loadHTML($dto->content, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (str_starts_with($img->getAttribute('src'), 'data:image/')) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $path = public_path() . '/storage/' . 'image' . '/static_pages/' . $id;
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $image_name = time() . $key . '.png';
                file_put_contents($path . '/' . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', url('storage/image/static_pages/' . $id) . '/' . $image_name);
            }
        }

        $dto->content = $dom->saveHTML();

        return $dto;
    }

    /**
     * @param string $slug
     * @return Model|null
     */
    public function findBySlug(string $slug): ?Model
    {
        return $this->repository->findBySlug($slug);
    }

    /**
     * @param Request $request
     * @return Model|null
     */
    public function toggle(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = !$entity['is_toggled'];

        return $this->repository->save($entity);
    }
}
