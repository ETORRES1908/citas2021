<script>
    $(document).ready(function(){
        $("#mapa").click(function (Evento) {
            Evento.preventDefault();
            //$("#mapas").attr("src","");

            var atributos = "width=500,height=500,left=200,top=200";
            open("https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.1422995957814!2d-76.9344505500158!3d-12.238642748788235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43a9c2bb03dc18ec!2sPuesto%20de%20Salud%20Oasis%20de%20Villa!5e0!3m2!1ses-419!2spe!4v1622944376548!5m2!1ses-419!2spe", "Posta Oasis de Villa", atributos);
        });
    });
</script>


<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        {{-- <x-jet-application-logo class="block h-12 w-auto" /> --}}
    </div>

    <div class="mt-8 text-2xl">
        <h2 class="text-indigo-600 font-bold" >Bienvenido al sistema de Reserva de Citas</h2>
    </div>



    <div class="mt-6 text-gray-500">
        El presente sistema web permite programar, visaualizar y cancelar las citas médicas a los pacientes. Puedes
        seleccionar tu especialidad y explicar tu caso al doctor de tu preferencia, los cuales publican sus horarios
        diaramente solo para ti. ¡Que esperas!, ¡registra una cita ya!
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Guia de Usuario</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Una guia de usuario donde podras aprender a utilizar el sistema de la mejor manera posible
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Galeria de Fotos</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                ¡Conoce nuestra posta!
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Noticias</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Enterate de lo ultimo en nuestra area de noticias
            </div>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
               <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a id="mapa" href="">Encuentrános</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Lima - Oasis de Villa - Villa el Salvador
            </div>
        </div>
    </div>
</div>


