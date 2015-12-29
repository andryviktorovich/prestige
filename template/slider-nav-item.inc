<script type="text/template" id="slider-nav-template">
  <div class="folio-slider__nav__item" data-item-id="<%= item.id %>">
    <img src="<%= item.preview %>" class="folio-slider__nav__item__image" alt=""/>
    <div class="folio-slider__nav__item__review">
      <% if(item.showInfo) { %>
      <div class="folio-slider__nav__item__review__wrapper">
        <h3 class="folio-slider__nav__item__review__title"><%= item.type_short %></h3>
        <p class="folio-slider__nav__item__review__text"><%= item.name %></p>
      </div>
      <% } %>
    </div>
  </div>
</script>
