   {include file="header.tpl"}
   <main class="main-product">
       <h2>Nuestros aromas</h2>
       
       <h3>Lista de aromas</h3>
       {if $sesion != false} 
        <h3>Alguien esta logueado</h3>
       {/if}
       <article class="lista_de_aromas">
           <ul>
               <li class="tipodearoma">Frutales</li>
               <li>Limon</li>
               <li>Melon y miel</li>
               <li>Arandanos</li>
               <li>Naranja</li>
               <li>Uva</li>
           </ul>
           <ul>
               <li class="tipodearoma">Epecias</li>
               <li>Chocolate</li>
               <li>Vainilla</li>
               <li>Coco</li>
               <li>Café</li>
               <li>Canela</li>
           </ul>
           <ul>
               <li class="tipodearoma">Fantasia</li>
               <li>Musk hindu</li>
               <li>Opium</li>
               <li>Reina de la noche</li>
               <li>Sai baba</li>
               <li>Aroma de angeles</li>
           </ul>
           <ul>
               <li class="tipodearoma">Florales</li>
               <li>Jazmin persa</li>
               <li>Fresias</li>
               <li>Nardo</li>
               <li>Lavanda</li>
               <li>Flores de azahar</li>
           </ul>
           <ul>
               <li class="tipodearoma">Hiervas</li>
               <li>Mirra</li>
               <li>Patchouly</li>
               <li>Citronella</li>
               <li>Menta</li>
               <li>Lemongras</li>
           </ul>
           <ul>
               <li class="tipodearoma">Maderas</li>
               <li>Sandalo dulce</li>
               <li>Palo santo</li>
               <li>Incienso</li>
               <li>7 poderes</li>
               <li>Cedro libano</li>
           </ul>
       </article>
       <article>
           <section>
               <h3>Inciensos</h3>
               <p>!!Los inciensos rinden 60 usos por paquete!!</p>
               <h4>Metodo de uso</h4>
               <ol class="li-product">
                   <li>Cortar trocitos de aproximadamente 1 centimetro.</li>
                   <li>Encender la superficie hasta que se genera la brasa.</li>
                   <li>Colocar en uno de nuestros quemadores de ceramica.</li>
                   <li>Disfrutar el aroma.</li>
               </ol>
           </section>
           <section>
               <h3>Conos</h3>
               <P>Los conitos tienen una duracion de 20min y se puede colocar en casi cualquier lugar.</P>
           </section>
           <section>
               <h3>Sahumerios</h3>
               <p>Nuestros sahumerios tienen una duracion de una hora por varilla.</p>
           </section>
       </article>
       <div>
           <h2>{$titulo}</h2>
           <table class="table">
               <thead class="thead-dark">
                   <tr>
                       <td>Aroma</td>
                       <td>Precio</td>
                       <td>Categoria</td>
                   </tr>
               </thead>
               <tbody>
               {$mensaje}
                   {foreach from=$productos item=producto}
                       <tr>
                           <td>{$producto->aroma}</td>
                           <td>{$producto->precio}</td>
                           <td><a href="categoria/{$producto->id_categoria}">{$producto->nombre}</a></td>
                           <td><a href="un_producto/{$producto->id_producto}" class="nav-link active">Ver mas</a></td>
                       </tr>
                   {/foreach}
               </tbody>
           </table>
       </div>
   </main>
   {include file="footer.tpl"}