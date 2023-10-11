**EX_01**

Para este ejercicio he tenido problemas con un error pero al final lo he podido hacer sin problema.
Este problema se produce ya que se debe poner el codigo php al inicio incluso antes de poner el doctype html ya que la cookie se debe mirar antes de enviar cualquier cosa al servidor.

Una vez esta esto clare el codigo funciona de la siguiente forma:

Primero miramos si la cookie de contador existe y ,si existe se recibe el valor, y si no existe se crea con el contador a zero.
Despues se incremente el contador.
Por ultimo se pone un contador de 3600s(1h) al contador antes de volver a 0.
Aqui cerramos el php y creamos todo el codigo html.
Dentro del html habrimos otra vez el php y ponemos un echo con el contador.