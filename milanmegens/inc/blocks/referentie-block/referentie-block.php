<div class="referentie">
    <div class="referentie-quote-icon">
        <i class="ph ph-fill ph-quotes"></i> <!-- Phosphor quote icoon -->
    </div>
    <?php if( have_rows('referentie_referenties') ): ?>
        <div class="referentie-slider">
            <?php 
            $counter = 0;  // Om de positie van de pijl bij te houden
            while ( have_rows('referentie_referenties') ) : the_row(); 
                $persoon = get_sub_field('referentie_persoon');
                $functie = get_sub_field('referentie_functie');
                $referentie = get_sub_field('referentie_referentie');
            ?>
                <div class="referentie-item" id="referentie_<?php echo $counter; ?>" style="display: <?php echo ($counter === 0 ? 'block' : 'none'); ?>">
                    <h1><?php echo esc_html($persoon); ?></h1>
                    <h2><?php echo esc_html($functie); ?></h2>
                    <p><?php echo esc_html($referentie); ?></p>
                </div>
                <?php $counter++; ?>
            <?php endwhile; ?>
        </div>
        
        <!-- Pijl Navigatie -->
        <div class="referentie-nav">
            <span id="prev" class="referentie-nav-arrow">&#10094;</span>
            <span id="next" class="referentie-nav-arrow">&#10095;</span>
        </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentIndex = 0;
        var items = document.querySelectorAll('.referentie-item');
        var totalItems = items.length;

        function showItem(index) {
            // Verberg alle items
            items.forEach(function(item, i) {
                item.style.display = (i === index) ? 'block' : 'none';
            });
        }

        document.getElementById('next').addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % totalItems;
            showItem(currentIndex);
        });

        document.getElementById('prev').addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            showItem(currentIndex);
        });

        // Laat het eerste item zien bij het laden
        showItem(currentIndex);

        // Swipe functionaliteit toevoegen
        var startX = 0;
        var endX = 0;

        // Detecteer het begin van een swipe (touchstart)
        document.querySelector('.referentie-slider').addEventListener('touchstart', function(event) {
            startX = event.touches[0].clientX;
        });

        // Detecteer het einde van een swipe (touchend)
        document.querySelector('.referentie-slider').addEventListener('touchend', function(event) {
            endX = event.changedTouches[0].clientX;

            var swipeDistance = startX - endX;
            if (swipeDistance > 50) {
                // Swipe naar links, ga naar de volgende referentie
                currentIndex = (currentIndex + 1) % totalItems;
            } else if (swipeDistance < -50) {
                // Swipe naar rechts, ga naar de vorige referentie
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            }
            showItem(currentIndex);
        });
    });
</script>

