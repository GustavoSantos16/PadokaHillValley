    
//Função para bloquear campos etc...
        function validar(caracter, blockType, campo){//Função para validar campos
                 document.getElementById(campo).style="background-color: #ffffff;";
                    //Tratamento para verificar qual tipo de navegador
                    //está vindo a tecla
                    if(window.event){
                        //Recebe a ascii do IE
                        var letra = caracter.charCode;
                    }else{
                        //Recebe ascii dos outros navegadores
                        var letra = caracter.which;
                    }

                    if(blockType == 'caracter'){
                        //BLOQUEIA Caracteres
                        if (letra < 48 || letra > 57){
                            if(letra != 8 && letra != 32){
                                //A variavel campo é recebida na função, nela 
                                //contem o ID do elemento a ser formatado
                                document.getElementById(campo).style="background-color: #f4a1a1;";//Troca a cor do elemento bg conforme for bloqueado
                                document.getElementById(campo).title="Apenas numeros são permitidos";
                                return false;
                            } 
                        }
                    }else if(blockType == 'number'){
                        //BLOQUEIA NUMEROS
                        if (letra >= 48 && letra <= 57){
                            if(letra != 8 && letra != 32){
                                document.getElementById(campo).style="background-color: #f4a1a1;";//Troca a cor do elemento bg conforme for bloqueado
                                document.getElementById(campo).title="Apenas letras são permitidas";
                                return false;
                            }
                        }
                    }
                
                
            }

//Funçao de mascaras de telefone
            function mascaraFone(obj){
                var numbers = obj.value.replace(/\D/g,''), char = {0:'(', 2: ') ', 6: '-'};
                obj.value = '';
                for(var i = 0; i < numbers.length; i++){
                    obj.value += (char[i] || '') + numbers[i];
                }
            }
            
            function mascaraCelular(obj){
                var numbers = obj.value.replace(/\D/g,''), char = {0:'(', 2: ') ', 7: '-'};
                obj.value = '';
                for(var i = 0; i < numbers.length; i++){
                    obj.value += (char[i] || '') + numbers[i];
                }
            }