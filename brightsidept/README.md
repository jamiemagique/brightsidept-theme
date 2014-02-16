brightsidept-theme
==================

## Implementation updates

### Homepage carousel
- Add homepage carousel block to content_top region
- See page.tpl.php for current dummy implementation
- Remove dummy implementation from page.tpl.php once in place

### Homepage profiles
- Add CSS class to view: items-3col
- Add CSS classes to each row: item box
- Add profile image field with div class: box-image
- Profile name <h2> class: item-title
- Profile title <h3> class: item-subtitle

### 1 column listing
- Row class: item
- Title class: item-title
- Subtitle class: item-subtitle
- Image class (default to float right): item-image

### 2 column listing
- Use same row and field classes as listed above for .item
- Add CSS class to view: items-2col

### New modules
- jqmulti (front end jQuery update for mmenu plugin)

### New libraries
- libraries/jquery/jquery-1.7.2.min.js
