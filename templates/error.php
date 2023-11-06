<main>
    <!-- h2>< ?php $this->error->get_class(); ?></h2 -->
    <h2>
        <?php echo $this->getExceptionClass(); ?>
    </h2>
    
    <!-- p>< ?php $this->error->get_error_message(); ?></p -->
    <p>
        <?php echo $this->getExceptionMessage(); ?>
    </p>
</main>