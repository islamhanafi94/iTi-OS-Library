{{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}

<label for="id-of-input" class="custom-checkbox">
  <input type="checkbox" id="id-of-input"/>
  <i class="glyphicon glyphicon-star-empty"></i>
  <i class="glyphicon glyphicon-star"></i>
</label>

<style>
      label {
  /* Presentation */
  font-size: 48px
}

/* Required Styling */

label input[type="checkbox"] {
  display: none;
}

.custom-checkbox {
  margin-left: 2em;
  position: relative;
  cursor: pointer;
}

.custom-checkbox .glyphicon {
  color: gold;
  position: absolute;
  top: 0.4em;
  left: -1.25em;
  font-size: 0.75em;
}

.custom-checkbox .glyphicon-star-empty {
  color: gray;
}

.custom-checkbox .glyphicon-star {
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

.custom-checkbox:hover .glyphicon-star{
  opacity: 0.5;
}

.custom-checkbox input[type="checkbox"]:checked ~ .glyphicon-star {
  opacity: 1;
}
  </style>