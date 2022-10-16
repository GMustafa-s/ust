<?php defined('Saivra') || die() ?>

<div class="container col-lg-8">
    <nav aria-label="breadcrumb">
        <ol class="custom-breadcrumbs small">
            <li><a href="<?= url() ?>"><?= l('index.breadcrumb') ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li><a href="<?= url('blog') ?>"><?= l('blog.breadcrumb') ?></a> <i class="fa fa-fw fa-angle-right"></i></li>
            <li class="active" aria-current="page"><?= $data->blog_posts_category->title ?></li>
        </ol>
    </nav>

    <h1 class="h3 m-0"><?= $data->blog_posts_category->title ?></h1>

    <div class="mt-4">
        <?php foreach($data->blog_posts as $blog_post): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="<?= SITE_URL . ($blog_post->language ? \Altum\Language::$active_languages[$blog_post->language] . '/' : null) . 'blog/' . $blog_post->url ?>" class="text-decoration-none">
                        <h2 class="h4 mb-1"><?= $blog_post->title ?></h2>
                    </a>

                    <p class="small text-muted">
                        <span><?= sprintf(l('global.datetime_tooltip'), \Altum\Date::get($blog_post->datetime, 2)) ?></span> |

                        <a href="<?= SITE_URL . ($data->blog_posts_category->language ? \Altum\Language::$active_languages[$data->blog_posts_category->language] . '/' : null) . 'blog/category/' . $data->blog_posts_category->url ?>" class="text-muted"><?= $data->blog_posts_category->title ?></a> |

                        <span><?= sprintf(l('blog.total_views'), nr($blog_post->total_views)) ?></span>
                    </p>

                    <?php if($blog_post->image): ?>
                        <a href="<?= SITE_URL . ($blog_post->language ? \Altum\Language::$active_languages[$blog_post->language] . '/' : null) . 'blog/' . $blog_post->url ?>">
                            <img src="<?= UPLOADS_FULL_URL . 'blog/' . $blog_post->image ?>" class="blog-post-image img-fluid w-100 rounded mb-3" />
                        </a>
                    <?php endif ?>

                    <p class="m-0"><?= $blog_post->description ?></p>
                </div>
            </div>
        <?php endforeach ?>

        <div class="mt-3"><?= $data->pagination ?></div>
    </div>
</div>
