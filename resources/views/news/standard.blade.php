<h1>listes des News</h1>
@forelse ($actus as $itemActu )
    <h3>{{Str::limit($itemActu->titre,30)}}</h3>
    <a href="{{route('news.standard.detail',$itemActu)}}">Voir...</a>
@empty
    <h2>pas de news</h2>
@endforelse