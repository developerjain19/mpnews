
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//trimg string
if (!function_exists('strTrim')) {
    function strTrim($str)
    {
        if (!empty($str)) {
            return trim($str);
        }
    }
}

//str replace
if (!function_exists('strReplace')) {
    function strReplace($search, $replace, $str)
    {
        if (!empty($str)) {
            return str_replace($search, $replace, $str);
        }
    }
}

//character limiter
if (!function_exists('characterLimiter')) {
    function characterLimiter($str, $limit, $endChar = '')
    {
        if (!empty($str) && strlen($str) > $limit) {
            return mb_strimwidth($str, 0, $limit + 3, $endChar);
        }
        return $str;
    }
}


function esc($data, string $context = 'html', ?string $encoding = null)
{
    if (is_array($data)) {
        foreach ($data as &$value) {
            $value = esc($value, $context);
        }
    }

    if (is_string($data)) {
        $context = strtolower($context);

        // Provide a way to NOT escape data since
        // this could be called automatically by
        // the View library.
        if ($context === 'raw') {
            return $data;
        }

        if (! in_array($context, ['html', 'js', 'css', 'url', 'attr'], true)) {
            throw new InvalidArgumentException('Invalid escape context provided.');
        }

        $method = $context === 'attr' ? 'escapeHtmlAttr' : 'escape' . ucfirst($context);

        static $escaper;
        if (! $escaper) {
            $escaper = new Escaper($encoding);
        }

        if ($encoding && $escaper->getEncoding() !== $encoding) {
            $escaper = new Escaper($encoding);
        }

        $data = $escaper->{$method}($data);
    }

    return $data;
}


if (!function_exists('getLogoEmail')) {
    function getLogoEmail()
    {
        $generalSettings = Globals::$generalSettings;
        if (!empty($generalSettings)) {
            if (!empty($generalSettings->logo_email) && file_exists(FCPATH . $generalSettings->logo_email)) {
                return base_url($generalSettings->logo_email);
            }
            return base_url("assets/img/logo.png");
        }
        return base_url("assets/img/logo.png");
    }
}

//get user avatar
if (!function_exists('getUserAvatar')) {
    function getUserAvatar($avatarPath)
    {
        if (!empty($avatarPath)) {
            if (file_exists(FCPATH . $avatarPath)) {
                return base_url($avatarPath);
            }
            return $avatarPath;
        }
        return base_url("assets/img/user.png");
    }
}

//translation
if (!function_exists('trans')) {
    function trans($string)
    {
      
        return "";
    }
}


//get sub menu links
if (!function_exists('getSubMenuLinks')) {
    function getSubMenuLinks($menuLinks, $parentId, $type)
    {
        $subLinks = array();
        if (!empty($menuLinks)) {
            $subLinks = array_filter($menuLinks, function ($item) use ($parentId, $type) {
                return $item->item_type == $type && $item->item_parent_id == $parentId;
            });
        }
        return $subLinks;
    }
}



//check if user online
if (!function_exists('isUserOnline')) {
    function isUserOnline($timestamp)
    {
        if (!empty($timestamp)) {
            $timeAgo = strtotime($timestamp);
            $currentTime = time();
            $timeDifference = $currentTime - $timeAgo;
            $seconds = $timeDifference;
            $minutes = round($seconds / 60);
            if ($minutes <= 3) {
                return true;
            }
        }
        return false;
    }
}

//esc & addslashes
if (!function_exists('escSls')) {
    function escSls($str)
    {
        if (!empty($str)) {
            return addslashes(esc($str));
        }
    }
}

//generate slug
if (!function_exists('strSlug')) {
    function strSlug($str)
    {
        $str = strTrim($str);
        if (!empty($str)) {
            return url_title(convert_accented_characters($str), "-", TRUE);
        }
    }
}

//clean slug
if (!function_exists('cleanSlug')) {
    function cleanSlug($slug)
    {
        $slug = strTrim($slug);
        if (!empty($slug)) {
            $slug = urldecode($slug);
        }
        if (!empty($slug)) {
            $slug = strip_tags($slug);
        }
        return removeSpecialCharacters($slug);
    }
}

//clean string
if (!function_exists('cleanStr')) {
    function cleanStr($str)
    {
        $str = strTrim($str);
        $str = removeSpecialCharacters($str);
        return esc($str);
    }
}

//clean number
if (!function_exists('cleanNumber')) {
    function cleanNumber($num)
    {
        $num = strTrim($num);
        $num = esc($num);
        if (empty($num)) {
            return 0;
        }
        return intval($num);
    }
}

//clean number
if (!function_exists('clrQuotes')) {
    function clrQuotes($str)
    {
        $str = strReplace('"', '', $str);
        $str = strReplace("'", '', $str);
        return $str;
    }
}

//remove forbidden characters
if (!function_exists('removeForbiddenCharacters')) {
    function removeForbiddenCharacters($str)
    {
        $str = strTrim($str);
        $str = strReplace(';', '', $str);
        $str = strReplace('"', '', $str);
        $str = strReplace('$', '', $str);
        $str = strReplace('%', '', $str);
        $str = strReplace('*', '', $str);
        $str = strReplace('/', '', $str);
        $str = strReplace('\'', '', $str);
        $str = strReplace('<', '', $str);
        $str = strReplace('>', '', $str);
        $str = strReplace('=', '', $str);
        $str = strReplace('?', '', $str);
        $str = strReplace('[', '', $str);
        $str = strReplace(']', '', $str);
        $str = strReplace('\\', '', $str);
        $str = strReplace('^', '', $str);
        $str = strReplace('`', '', $str);
        $str = strReplace('{', '', $str);
        $str = strReplace('}', '', $str);
        $str = strReplace('|', '', $str);
        $str = strReplace('~', '', $str);
        $str = strReplace('+', '', $str);
        return $str;
    }
}

//remove special characters
if (!function_exists('removeSpecialCharacters')) {
    function removeSpecialCharacters($str, $removeQuotes = false)
    {
        $str = removeForbiddenCharacters($str);
        $str = strReplace('#', '', $str);
        $str = strReplace('!', '', $str);
        $str = strReplace('(', '', $str);
        $str = strReplace(')', '', $str);
        if ($removeQuotes) {
            $str = clrQuotes($str);
        }
        return $str;
    }
}



//check admin nav
if (!function_exists('getEarningObjectByDay')) {
    function getEarningObjectByDay($day, $pageViewsCounts)
    {
        if ($day < 10 && strpos($day, '0') == false) {
            $day = str_pad($day, 2, '0', STR_PAD_LEFT);
        }
        $date = date('Y') . '-' . date('m') . '-' . $day;
        $objects = array_filter($pageViewsCounts, function ($item) use ($date) {
            return $item->date == $date;
        });
        $object = null;
        if (!empty($objects)) {
            foreach ($objects as $key => $value) {
                $object = $value;
                break;
            }
        }
        return $object;
    }
}

//set cookie
if (!function_exists('helperSetCookie')) {
    function helperSetCookie($name, $value, $time = null)
    {
        if ($time == null) {
            $time = time() + (86400 * 30);
        }
        if (empty($params)) {
            $config = config('App');
            $params = array(
                'expires' => $time,
                'path' => $config->cookiePath,
                'domain' => $config->cookieDomain,
                'secure' => $config->cookieSecure,
                'httponly' => $config->cookieHTTPOnly,
                'samesite' => $config->cookieSameSite,
            );
        }
        if (!empty(getenv('cookie.prefix'))) {
            $name = getenv('cookie.prefix') . '_' . $name;
        }
        setcookie($name, $value, $params);
    }
}

//get cookie
if (!function_exists('helperGetCookie')) {
    function helperGetCookie($name)
    {
        if (!empty(getenv('cookie.prefix'))) {
            $name = getenv('cookie.prefix') . '_' . $name;
        }
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        }
        return false;
    }
}

//delete cookie
if (!function_exists('helperDeleteCookie')) {
    function helperDeleteCookie($name)
    {
        if (!empty(helperGetCookie($name))) {
            helperSetCookie($name, '', time() - 3600);
        }
    }
}


//generate unique id
if (!function_exists('generateToken')) {
    function generateToken()
    {
        $id = uniqid("", TRUE);
        $id = strReplace(".", "-", $id);
        return $id . "-" . rand(10000000, 99999999);
    }
}

//get validation rules
if (!function_exists('getValRules')) {
    function getValRules($val)
    {
        $rules = $val->getRules();
        $newRules = array();
        if (!empty($rules)) {
            foreach ($rules as $key => $rule) {
                $newRules[$key] = [
                    'label' => $rule['label'],
                    'rules' => $rule['rules'],
                    'errors' => [
                        'required' => trans("form_validation_required"),
                        'min_length' => trans("form_validation_min_length"),
                        'max_length' => trans("form_validation_max_length"),
                        'matches' => trans("form_validation_matches"),
                        'is_unique' => trans("form_validation_is_unique")
                    ]
                ];
            }
        }
        return $newRules;
    }
}


//get navigation item delete function
if (!function_exists('getAdminNavItemDeleteFunction')) {
    function getAdminNavItemDeleteFunction($menuItem)
    {
        if (!empty($menuItem)) {
            if ($menuItem->item_type == "category") {
                return "deleteItem('CategoryController/deleteCategoryPost','" . $menuItem->item_id . "','" . trans("confirm_category") . "');";
            } else {
                if (!empty($menuItem->item_link)) {
                    return "deleteItem('AdminController/deleteNavigationPost','" . $menuItem->item_id . "','" . trans("confirm_link") . "');";
                } else {
                    return "deleteItem('AdminController/deletePagePost','" . $menuItem->item_id . "','" . trans("confirm_page") . "');";
                }
            }
        }
    }
}

//get navigation item type
if (!function_exists('getAdminNavItemType')) {
    function getAdminNavItemType($menuItem)
    {
        if (!empty($menuItem)) {
            if ($menuItem->item_type == "category") {
                return trans("category");
            } else {
                if (!empty($menuItem->item_link)) {
                    return trans("link");
                } else {
                    return trans("page");
                }
            }
        }
    }
}

//count items
if (!function_exists('countItems')) {
    function countItems($items)
    {
        if (!empty($items) && is_array($items)) {
            return count($items);
        }
        return 0;
    }
}

//is recaptcha enabled
if (!function_exists('isRecaptchaEnabled')) {
    function isRecaptchaEnabled($generalSettings)
    {
        if (!empty($generalSettings->recaptcha_site_key) && !empty($generalSettings->recaptcha_secret_key)) {
            return true;
        }
        return false;
    }
}


//date format with month
if (!function_exists('formatDateFront')) {
    function formatDateFront($timestamp)
    {
        if (!empty($timestamp)) {
            $date = date("M j, Y", strtotime($timestamp));
            return replaceMonthName($date);
        }
    }
}

//date format
if (!function_exists('formatDate')) {
    function formatDate($timestamp)
    {
        if (!empty($timestamp)) {
            return date("Y-m-d / H:i", strtotime($timestamp));
        }
    }
}

//print formatted hour
if (!function_exists('formatHour')) {
    function formatHour($timestamp)
    {
        if (!empty($timestamp)) {
            return date("H:i", strtotime($timestamp));
        }
    }
}

//date format
if (!function_exists('replaceMonthName')) {
    function replaceMonthName($str)
    {
        $str = strTrim($str);
        $str = strReplace("Jan", trans("January"), $str);
        $str = strReplace("Feb", trans("February"), $str);
        $str = strReplace("Mar", trans("March"), $str);
        $str = strReplace("Apr", trans("April"), $str);
        $str = strReplace("May", trans("May"), $str);
        $str = strReplace("Jun", trans("June"), $str);
        $str = strReplace("Jul", trans("July"), $str);
        $str = strReplace("Aug", trans("August"), $str);
        $str = strReplace("Sep", trans("September"), $str);
        $str = strReplace("Oct", trans("October"), $str);
        $str = strReplace("Nov", trans("November"), $str);
        $str = strReplace("Dec", trans("December"), $str);
        return $str;
    }
}

//date diff
if (!function_exists('dateDifference')) {
    function dateDifference($date1, $date2, $format = '%a')
    {
        if (!empty($date1) && !empty($date2)) {
            $datetime1 = date_create($date1);
            $datetime2 = date_create($date2);
            $diff = date_diff($datetime1, $datetime2);
            return $diff->format($format);
        }
    }
}

//date difference in hours
if (!function_exists('dateDifferenceInHours')) {
    function dateDifferenceInHours($date1, $date2)
    {
        if (!empty($date1) && !empty($date2)) {
            $datetime1 = date_create($date1);
            $datetime2 = date_create($date2);
            $diff = date_diff($datetime1, $datetime2);
            $days = $diff->format('%a');
            $hours = $diff->format('%h');
            return $hours + ($days * 24);
        }
    }
}




if (!function_exists('timeAgo')) {
    function timeAgo($timestamp)
    {
        if (!empty($timestamp)) {
            $timeDiff = time() - strtotime($timestamp);
            $seconds = $timeDiff;
            $minutes = round($seconds / 60);
            $hours = round($seconds / 3600);
            $days = round($seconds / 86400);
            $weeks = round($seconds / 604800);
            $months = round($seconds / 2629440);
            $years = round($seconds / 31553280);
            if ($seconds <= 60) {
                return trans("just_now");
            } else if ($minutes <= 60) {
                if ($minutes == 1) {
                    return "1 " . trans("minute") . " " . trans("ago");
                } else {
                    return $minutes . " " . trans("minutes") . " " . trans("ago");
                }
            } else if ($hours <= 24) {
                if ($hours == 1) {
                    return "1 " . trans("hour") . " " . trans("ago");
                } else {
                    return $hours . " " . trans("hours") . " " . trans("ago");
                }
            } else if ($days <= 30) {
                if ($days == 1) {
                    return "1 " . trans("day") . " " . trans("ago");
                } else {
                    return $days . " " . trans("days") . " " . trans("ago");
                }
            } else if ($months <= 12) {
                if ($months == 1) {
                    return "1 " . trans("month") . " " . trans("ago");
                } else {
                    return $months . " " . trans("months") . " " . trans("ago");
                }
            } else {
                if ($years == 1) {
                    return "1 " . trans("year") . " " . trans("ago");
                } else {
                    return $years . " " . trans("years") . " " . trans("ago");
                }
            }
        }
    }
}

//paginate
if (!function_exists('paginate')) {
    function paginate($perPage, $total)
    {
        $page = @intval(inputGet('page'));
        if (empty($page) || $page < 1) {
            $page = 1;
        }
        $pager = \Config\Services::pager();
        $pager->makeLinks($page, $perPage, $total);
        $pager->page = $page;
        $pager->offset = ($page - 1) * $perPage;
        return $pager;
    }
}

//paginate
if (!function_exists('getIPAddress')) {
    function getIPAddress()
    {
        $request = \Config\Services::request();
        return $request->getIPAddress();
    }
}

//convert xml characters
if (!function_exists('convertToXMLCharacter')) {
    function convertToXMLCharacter($string)
    {
        $str = strReplace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string);
        $str = strReplace('#45;', '', $str);
        return $str;
    }
}


//calculate total vote of poll option
if (!function_exists('calculateTotalVotePollOption')) {
    function calculateTotalVotePollOption($poll)
    {
        $total = 0;
        if (!empty($poll)) {
            for ($i = 1; $i <= 10; $i++) {
                $op = "option{$i}_vote_count";
                $total += $poll->$op;
            }
        }
        return $total;
    }
}



//get widget
if (!function_exists('getWidget')) {
    function getWidget($baseWidgets, $type)
    {
        if (!empty($baseWidgets)) {
            foreach ($baseWidgets as $widget) {
                if ($widget->type == $type) {
                    return $widget;
                }
            }
        }
        return null;
    }
}

//get category widgets
if (!function_exists('getCategoryWidgets')) {
    function getCategoryWidgets($categoryId, $baseWidgets, $adSpaces, $langId)
    {
        $arrayWidgets = array();
        $widgetIds = array();
        $ads = array();
        $hasWidgets = false;
        if (!empty($baseWidgets)) {
            if (empty($categoryId)) {
                foreach ($baseWidgets as $widget) {
                    if (empty($widget->display_category_id) && !in_array($widget->id, $widgetIds) && $widget->lang_id == $langId) {
                        array_push($arrayWidgets, $widget);
                        array_push($widgetIds, $widget->id);
                    }
                }
            } else {
                foreach ($baseWidgets as $widget) {
                    if ($widget->display_category_id == $categoryId && !in_array($widget->id, $widgetIds) && $widget->lang_id == $langId) {
                        array_push($arrayWidgets, $widget);
                        array_push($widgetIds, $widget->id);
                    }
                }
            }
        }
        if (!empty($adSpaces)) {
            foreach ($adSpaces as $item) {
                if ($item->display_category_id == $categoryId) {
                    array_push($ads, $item);
                }
            }
        }
        if (!empty($arrayWidgets) || !empty($ads)) {
            $hasWidgets = true;
        }

        $classWidgets = new stdClass();
        $classWidgets->widgets = $arrayWidgets;
        $classWidgets->ads = $ads;
        $classWidgets->hasWidgets = $hasWidgets;
        return $classWidgets;
    }
}

//is reaction voted
if (!function_exists('isReactionVoted')) {
    function isReactionVoted($postId, $reaction)
    {
        if (!empty(helperGetCookie('reaction_' . $reaction . '_' . $postId))) {
            return true;
        }
        return false;
    }
}

//get font family
if (!function_exists('getFontFamily')) {
    function getFontFamily($activeFonts, $key, $removeFamilyText = false)
    {
        if (!empty($activeFonts[$key]) && !empty($activeFonts[$key]->font_family)) {
            $fontFamily = $activeFonts[$key]->font_family;
            if (!empty($fontFamily)) {
                if ($removeFamilyText) {
                    $fontFamilyArray = explode(':', $fontFamily);
                    if (!empty($fontFamilyArray[1])) {
                        return $fontFamilyArray[1];
                    }
                }
                return $activeFonts[$key]->font_family;
            }
        }
        return '';
    }
}

//get font url
if (!function_exists('getFontURL')) {
    function getFontURL($activeFonts, $key)
    {
        if (!empty($activeFonts[$key]) && !empty($activeFonts[$key]->font_url) && $activeFonts[$key]->font_source != 'local') {
            return $activeFonts[$key]->font_url;
        }
        return '';
    }
}

//load library
if (!function_exists('loadLibrary')) {
    function loadLibrary($library)
    {
        $path = APPPATH . 'Libraries/' . $library . '.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }
}

/**
 * --------------------------------------------------------------------------
 * POST FUNCTIONS
 * --------------------------------------------------------------------------
 */

//set cache data



//get category
if (!function_exists('getCategory')) {
    function getCategory($id, $categories)
    {
        $category = null;
        if (!empty($categories)) {
            $category = array_filter($categories, function ($item) use ($id) {
                return $item->id == $id;
            });
            foreach ($category as $key => $value) {
                $category = $value;
                break;
            }
        }
        return $category;
    }
}


//get category tree
if (!function_exists('getCategoryTree')) {
    function getCategoryTree($categoryId, $categories)
    {
        $tree = array();
        $categoryId = cleanNumber($categoryId);
        if (!empty($categoryId)) {
            array_push($tree, $categoryId);
            $subCategories = getSubcategories($categoryId, $categories);
            if (!empty($subCategories)) {
                foreach ($subCategories as $subCategory) {
                    array_push($tree, $subCategory->id);
                }
            }
        }
        return $tree;
    }
}

//get parent category tree
if (!function_exists('getParentCategoryTree')) {
    function getParentCategoryTree($categoryId, $categories)
    {
        $tree = array();
        $categoryId = cleanNumber($categoryId);
        if (!empty($categoryId)) {
            $category = getCategory($categoryId, $categories);
            if (!empty($category) && $category->parent_id != 0) {
                $parent = getCategory($category->parent_id, $categories);
                if (!empty($parent)) {
                    array_push($tree, $parent);
                }
            }
            array_push($tree, $category);
        }
        return $tree;
    }
}

//get posts by category
if (!function_exists('getPostsByCategoryId')) {
    function getPostsByCategoryId($categoryId, $categories, $latestCategoryPosts)
    {
        if (!empty($latestCategoryPosts)) {
            $categoryTree = getCategoryTree($categoryId, $categories);
            if (!empty($categoryTree)) {
                return array_filter($latestCategoryPosts, function ($item) use ($categoryTree) {
                    return in_array($item->category_id, $categoryTree);
                });
            }
        }
        return null;
    }
}

//get post by id
if (!function_exists('getPostById')) {
    function getPostById($id)
    {
        $model = $this->load->model('PostAdminModel');
        return $model->getPost($id);
    }
}

//get post image

//check post image exist
if (!function_exists('checkPostImg')) {
    function checkPostImg($post, $type = '')
    {
        $isExist = false;
        if (!empty($post)) {
            if (!empty($post->image_mid) || !empty($post->image_small) || !empty($post->image_url)) {
                $isExist = true;
            }
        }
        if ($isExist == false && $type == 'class') {
            echo " post-item-no-image";
        } else {
            if ($type != 'class') {
                return $isExist;
            }
        }
    }
}

//get popular posts
if (!function_exists('getPopularPosts')) {
    function getPopularPosts($langId, $latestCategoryPosts)
    {
        $model = new \App\Models\PostModel();
        $popularPosts = getCachedDataByLang('popular_posts', $langId);
        if (empty($popularPosts)) {
            $popularPosts = completePopularPosts($model->getPopularPosts($langId), $langId, $latestCategoryPosts);
            setCacheDataByLang('popular_posts', $popularPosts, $langId);
        }
        return $popularPosts;
    }
}

//complete popular posts
if (!function_exists('completePopularPosts')) {
    function completePopularPosts($popularPosts, $langId, $latestCategoryPosts)
    {
        if (countItems($popularPosts) >= 5) {
            return $popularPosts;
        }
        if (!empty($latestCategoryPosts)) {
            foreach ($latestCategoryPosts as $post) {
                if ($post->lang_id == $langId) {
                    $inArray = false;
                    foreach ($popularPosts as $item) {
                        if ($item->id == $post->id) {
                            $inArray = true;
                        }
                    }
                    if ($inArray == false) {
                        $newPopular = clone $post;
                        $newPopular->pageviews = 0;
                        array_push($popularPosts, $newPopular);
                    }
                    if (countItems($popularPosts) >= 5) {
                        return $popularPosts;
                        break;
                    }
                }
            }
        }
        return $popularPosts;
    }
}

//get recommended posts
if (!function_exists('getRecommendedPosts')) {
    function getRecommendedPosts()
    {
        $recommendedPosts = getCachedData('recommended_posts');
        if (empty($recommendedPosts)) {
            $model = new  \App\Models\PostModel();
            $recommendedPosts = $model->getRecommendedPosts();
            setCacheData('recommended_posts', $recommendedPosts);
        }
        return $recommendedPosts;
    }
}

//get latest posts
if (!function_exists('getLatestPosts')) {
    function getLatestPosts($limit)
    {
        $key = 'latest_posts_' . $limit;
        $posts = getCachedData($key);
        if (empty($posts)) {
            $model = new  \App\Models\PostModel();
            $posts = $model->getLatestPosts($limit);
            setCacheData($key, $posts);
        }
        return $posts;
    }
}

//get most viewed posts
if (!function_exists('getMostViewedPosts')) {
    function getMostViewedPosts($limit)
    {
        $key = 'most_viewed_posts_' . $limit;
        $posts = getCachedData($key);
        if (empty($posts)) {
            $model = new  \App\Models\PostModel();
            $posts = $model->getMostViewedPosts($limit);
            setCacheData($key, $posts);
        }
        return $posts;
    }
}

//get post images
if (!function_exists('getPostAdditionalImages')) {
    function getPostAdditionalImages($postId)
    {
        $model = $this->load->model('PostAdminModel');
        return $model->getAdditionalImages($postId);
    }
}

//get post files
if (!function_exists('getPostFiles')) {
    function getPostFiles($postId)
    {
        $model = $this->load->model('PostAdminModel');
        return $model->getPostFiles($postId);
    }
}

//get quiz question answer
if (!function_exists('getQuizQuestionAnswers')) {
    function getQuizQuestionAnswers($questionId)
    {
        $model = new \App\Models\QuizModel();
        return $model->getQuizQuestionAnswers($questionId);
    }
}

//get post audios
if (!function_exists('getPostAudios')) {
    function getPostAudios($postId)
    {
        $model = $this->load->model('PostAdminModel');
        return $model->getPostAudios($postId);
    }
}

//check post delete permission
if (!function_exists('checkPostOwnership')) {
    function checkPostOwnership($ownerId)
    {
        if (checkUserPermission('manage_all_posts')) {
            return true;
        }
        if ($ownerId == user()->id) {
            return true;
        }
    }
}

//set post meta tags
if (!function_exists('setPostMetaTags')) {
    function setPostMetaTags($post, $postTags, $data)
    {
        $data['title'] = $post->title;
        $data['description'] = $post->summary;
        $data['keywords'] = $post->keywords;
        $data['ogTitle'] = $post->title;
        $data['ogType'] = 'article';
        $data['ogImage'] = getPostImage($post, 'big');
        $data['ogWidth'] = '750';
        $data['ogHeight'] = '422';
        $data['ogCreator'] = $post->author_username;
        $data['ogAuthor'] = $post->author_username;
        $data['ogPublishedTime'] = $post->created_at;
        $data['ogModifiedTime'] = $post->updated_at;
        if (empty($post->updated_at)) {
            $data['ogModifiedTime'] = $post->created_at;
        }
        $data['ogTags'] = $postTags;
        return $data;
    }
}


//get subcomments
if (!function_exists('getSubComments')) {
    function getSubComments($parentId)
    {
        $model = new \App\Models\CommonModel();
        return $model->getSubComments($parentId);
    }
}
