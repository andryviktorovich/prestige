<script type="text/template" id="slider-item-template">
  <div class="folio-slider__block" data-item-id="<%= item.id %>">
    <div class="folio-slider__image" data-normalize="true">
      <img src="<%= item.image %>"/>
    </div>
    <div class="folio-slider__review">
      <h3 class="folio-slider__review__title"><%= item.type %></h3>
      <p class="folio-slider__review__name"><%= item.name %></p>
      <div class="folio-slider__review__text">
        <%= item.review %>
      </div>
      <a href="<%= item.link %>" class="folio-slider__link"></a>
    </div>
  </div>
</script>
