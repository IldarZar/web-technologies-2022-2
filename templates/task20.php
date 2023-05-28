    <?= $title ?>

    <div class="list-items" id="list-items">
        <?= $directories ?>
    </div>

    <script>
        const parents = document.getElementById('list-items').querySelectorAll('[data-parent]');

        parents.forEach(parent => {

            const open = parent.querySelector('[data-open]');
            open.addEventListener('click', () => parent.classList.toggle('list-item_open'));
        });
    </script>