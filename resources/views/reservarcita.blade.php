<x-app-layout>

    <div class="container py-8">
        <p class="text text-3xl" style="padding: 0px 10px 10px 75px">Selecciona Especialidad</p>
  
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" style="padding:10px 50px 0px 75px">
            
            <article class="w-full h-80 bg-cover bg-center  
                    @if(true)
                    {{-- @if($speciality->nombre=='Medicina General') --}}
                        md:col-span-1
                        @endif"   style="background-image: url('../images/especialistas/medicina1.jpg'); border-radius: 15px" >
                         
                <div class="w-full h-full px-8 flex flex-col justify-center" style="padding: 100px 10px 10px 10px" >
                    <div>
                        <a href="#" class="inline-block px-3 h-6 bg-lightblue-600 text-gray rounded-full"></a>
                    </div>
                    <h1 class="text-2xl text-black leading-0 font-bold">

                        <a href="#" style="text-decoration:none"  class="underline">
                            <p>Medicina</p>
                        </a>
                    </h1>

                    <p>Descripción</p>

                </div>
            </article>

            <article class="w-full h-80 bg-cover bg-center  
                    @if(true)
                    {{-- @if($speciality->nombre=='Medicina General') --}}
                        md:col-span-1
                        @endif"  style="background-image: url('../images/especialistas/odontologia.jpg'); border-radius: 15px" >
                         
                <div class="w-full h-full px-8 flex flex-col justify-center" style="padding: 100px 10px 10px 10px">
                    
                    <div>
                        <a href="#" class="inline-block px-3 h-6 bg-lightblue-600 text-gray rounded-full"></a>
                    </div>
                    <h1 class="text-2xl text-black leading-0 font-bold">

                        <a href="#" style="text-decoration:none" class="underline">
                            <p>Adontología</p>
                        </a>
                    </h1>

                    <p>Descripción</p>

                </div>
              
            </article>

            <article class="w-full h-80 bg-cover bg-center  
                    @if(true)
                    {{-- @if($speciality->nombre=='Medicina General') --}}
                        md:col-span-1
                        @endif"  style="background-image: url('../images/especialistas/obstetricia1.jpg'); border-radius: 15px" >
                         
                <div class="w-full h-full px-8 flex flex-col justify-center" style="padding: 100px 10px 10px 10px">
                    
                    <div>
                        <a href="#" style="text-decoration:none" class="inline-block px-3 h-6 bg-lightblue-600 text-gray rounded-full"></a>
                    </div>
                    <h1 class="text-2xl text-black leading-0 font-bold">

                        <a href="#" style="text-decoration:none" class="underline">
                            <p>Obstetricia</p>
                        </a>
                    </h1>

                    <p>Descripción</p>

                </div>
            </article>

             <article class="w-full h-80 bg-cover bg-center  
                    @if(true)
                    {{-- @if($speciality->nombre=='Medicina General') --}}
                        md:col-span-1
                        @endif"  style="background-image: url('../images/especialistas/pediatria.jpg'); border-radius: 15px" >
                         
                <div class="w-full h-full px-8 flex flex-col justify-center" style="padding: 100px 10px 10px 10px">
                    
                    <div>
                        <a href="#" style="text-decoration:none" style="text-decoration:none" class="inline-block px-3 h-6 bg-lightblue-600 text-gray rounded-full"></a>
                    </div>
                    <h1 class="text-2xl text-black leading-0 font-bold">

                        <a href="#" style="text-decoration:none" class="underline">
                            <p>Pediatria</p>
                        </a>
                    </h1>

                    <p>Descripción</p>

                </div>
            </article>
            {{-- @foreach ($specialities as $speciality)
            <article class="w-full h-80 bg-cover bg-center  
                    @if($loop->first)
                    {{-- @if($speciality->nombre=='Medicina General') --}}
                        {{-- md:col-span-2
                        @endif"  style="background-color: lightblue" >
                         
                <div class="w-full h-full px-8 flex flex-col justify-center" style="padding: 100px 10px 10px 10px">
                    
                    <div>
                        <a href="#" class="inline-block px-3 h-6 bg-lightblue-600 text-gray rounded-full"></a>
                    </div>
                    <h1 class="text-2xl text-black leading-0 font-bold">

                        <a href="{{route('cita.reserva.show',$speciality)}}" class="underline">
                            {{$speciality->nombre}}
                        </a>
                    </h1>

                    {{$speciality->descripcion}}

                </div>
            </article> --}}
          {{--  @endforeach --}}

        </div>

    </div>




</x-app-layout>
