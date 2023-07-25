@extends('frontend')
@section('content')

    <div class="container px-6 mx-auto">
	 
        <h3 class="text-2xl font-medium text-gray-700 text-green-700  border-b-8 border-x-4
  border-y-4 border-blue-200 rounded-md shadow-md">Product List</h3>
			<p> Categories Available : | <a href="/?cat=all">All</a>  | <a href="/?cat=books">Books</a> | <a href="/?cat=ict">ICT</a>  | <a href="/?cat=other">Other</a>  |          -> {{ $cat }}  ({{$cnt}} items )  </p>
	   
        <div class="grid grid-cols-1 gap-6 mt-6   sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto drop-shadow-2xl border-b-4 border-r-1 border-t-2 border-blue-200 px-16  overflow-hidden bg-fuchsia-300  rounded-md shadow-md">
			<p><br></p>
                <a  class="img" href=""><img src="./images/{{$product->image}}" alt="" id="{{$product->image}}" " class="w-auto max-h-60"></a>
                <div class="flex   w-full  bg-cover">
                </div>
                <div class="px-5 py-3">
                    <h6 class="text-gray-700 uppercase">{{ $product->name }}</h6>
					<p class="text-gray-700">{{'(Qty Avail:'.$product->qty.')' }}</p>
                    <span class="mt-2 text-red-500">Ksh {{ $product->price }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
						
                    </form>

	<hr>				
	<button type="button" onclick="getid({{$product->id }})")
		class="inline-block px-2 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight  rounded shadow-md hover:bg-g-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
		data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		View Details
	</button>
                </div>   
            </div>
			
			
			
	<div id="{{ $product->id }}" class="modal fade m-auto h-screen flex justify-center items-center  mx-auto mt-5 p-7 bg-brown-400  justify-items-center hidden  focus:border-blue-500 overflow-x-auto rounded-md overflow-y-auto"
  id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative bg-orange-400 flex flex-col w-96 pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 bg-yellow-400 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800"  id="exampleModalLabel">
          Product Details
        </h5><br><br>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
		  <div
        class="modal-footer flex flex-shrink-0 bg-yellow-400 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button"
          class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
          data-bs-dismiss="modal">X</button>
        
      </div>
      </div>
	   <div class="modal-body relative p-4 text-green-700 border-solid  border-b border-blue-200">
        <b>Product Code:</b> {{ $product->id }}
      </div>
      <div class="modal-body relative p-4 text-green-700 border-b border-blue-200">
        <b>Product Name:</b> {{ $product->name }}
      </div>
	   <div class="modal-body relative text-green-700 p-4 border-b border-blue-200">
        <b>Product Description:</b> {{ $product->description }}
      </div>
	   <div class="modal-body relative text-green-700 p-4 border-b border-blue-200">
        <b>Product Price: </b>Ksh {{ $product->price.'/-' }}
      </div>
      <div
        class="modal-footer flex flex-shrink-0 bg-yellow-400 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
        <button type="button"
          class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
          data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>	
			
			
			
			
			
            @endforeach
        </div>
    </div>
	
@endsection