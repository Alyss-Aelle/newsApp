<form action="{{route('news.add')}}" method="post" 
enctype="multipart/form-data"> <!--envoyer des fichiers -->
  @csrf
<div class="mb-5">
  <label for="titre" class="mb-3 block text-base font-medium text-orange-700">
    Titre
  </label>

  <input  type="text"
          name="titre" 

    placeholder="Saisissez votre titre"
    class="w-full rounded-md border border-red-200 bg-white py-3 px-6 text-gray-700 outline-none focus:border-purple-300 focus:shadow-md"
    />
    @error('titre')
      Vous devez saisir un titre 
    @enderror
</div>
<div class="mb-5">
  <label for="image" class="mb-3 block text-base font-medium text-orange-700">
    Image
  </label>

  <input  type="file"
          name="image" 

    placeholder="Ajoutez votre image"
    class="w-full rounded-md border border-red-200 bg-white py-3 px-6 text-gray-700 outline-none focus:border-purple-300 focus:shadow-md"
    />
    @error('image')
      Vous devez ajouter une imager au bon format
    @enderror
</div>

<div class="mb-5">
  <label for="description" class="mb-3 block text-base font-medium text-orange-700">
    Description
  </label>

  <textarea rows="4"
          name="description" 

    placeholder="Ajoutez votre description"
    class="w-full rounded-md border border-red-200 bg-white py-3 px-6 text-gray-700 outline-none focus:border-purple-300 focus:shadow-md"
    ></textarea>
    @error('description')
      Vous devez ajouter description
    @enderror
</div>
<div class="mb-5">
  <button class="bg-orange-600 px-8 py-3 text-white rounded-md font-bold">Ajouter</button>
</div>
</form>