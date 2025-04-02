@foreach ($item->attributrvalues as $item)
   <div class="badge border-primary primary badge-border">
    {{  $item->getTranslation('value', app()->getLocale()) }}
    </div>
@endforeach