<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NewsPost> $posts
 * @property-read int|null $posts_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KindOfWork
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCategory> $product_categories
 * @property-read int|null $product_categories_count
 * @method static \Database\Factories\KindOfWorkFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KindOfWork whereUpdatedAt($value)
 */
	class KindOfWork extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Leads
 *
 * @property int $id
 * @property string $name
 * @property string $contactInfo
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Leads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leads query()
 * @method static \Illuminate\Database\Eloquent\Builder|Leads whereContactInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leads whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leads whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leads whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leads whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leads whereUpdatedAt($value)
 */
	class Leads extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NewsPost
 *
 * @property int $id
 * @property string $title
 * @property string $main_image
 * @property int $is_toggled
 * @property string $content
 * @property string $description
 * @property int $category_id
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @method static \Database\Factories\NewsPostFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereIsToggled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsPost withoutTrashed()
 */
	class NewsPost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $main_image
 * @property string $content
 * @property int $code
 * @property string $gloss_level
 * @property string $description
 * @property string $type
 * @property string $colors
 * @property string $base
 * @property string $v_of_dry_remain
 * @property string $time_to_repeat
 * @property string $consumption
 * @property string $thickness
 * @property string $slug
 * @property int $product_category_id
 * @property int $is_toggled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductCategory $category
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGlossLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsToggled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereThickness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTimeToRepeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVOfDryRemain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $title
 * @property int $kind_of_work_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KindOfWork $kind_of_work
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\ProductCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereKindOfWorkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StaticPage
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string $slug
 * @property int $is_toggled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereIsToggled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaticPage withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class StaticPage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int $user_role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\UserRoles $userRoles
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRoleId($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserRoles
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\UserRolesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoles whereUpdatedAt($value)
 */
	class UserRoles extends \Eloquent {}
}

