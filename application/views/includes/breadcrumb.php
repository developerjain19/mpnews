<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item active"><?= $title ?></li>
    </ol>
</nav>
<h1 class="page-title <?= ((isset($details))? 'd-none':'') ?>"><?= $title ?></h1>