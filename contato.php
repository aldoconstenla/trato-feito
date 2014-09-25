<?php include_once('header.php'); ?>

            <div class="minibanner">
                <div class="centralizar">
                    <p>CONTATO</p>
                </div> 
            </div>
            <div class="centralizar">
                <div class="textos clearfix">
                    
                    <div class="formulario">
                        <h2>Faça seu Orçamento ou entre em contato!</h2>
                        <p>Preencha o formulário abaixo para entrar em contato conosco ou solicitar um Orçamento.</p>

                        <form class="clearfix" id="ajax-contact" method="post" action="mailer.php">

                             <p><label for="empresa">Empresa*:</label>
                            <input class="campo" type="text" name="empresa" id="empresa" placeholder="Empresa" required/></p>

                            <p><label for="responsavel">Nome do Responsavel*:</label>
                            <input class="campo" type="text" name="responsavel" id="responsavel" placeholder="Responsável" required/></p>

                            <p><label for="email">E-mail*:</label>
                            <input class="campo" type="email" name="email" id="email" placeholder="E-mail" required/></p>

                            <p><label for="telefone">Telefone:</label>
                            <input class="campo" type="text" name="telefone" id="telefone" placeholder="Telefone"/></p>

                            <p><label for="bairro">Bairro:</label>
                            <input class="campo" type="text" name="bairro" id="bairro" placeholder="Bairro"/></p>

                            <p><label for="cidade">Cidade*:</label>
                            <input class="campo" type="text" name="cidade" id="cidade" placeholder="Cidade" required/></p>

                            <p><label for="estado">Estado:</label>
                            <input class="campo" type="text" name="estado" id="estado" placeholder="Estado"/></p>

                            <label><p>Tipo de Contato:</p></label>
                            <input type="radio" name="tipo_contato" value="Mensagem" id="tipom" class="check">
                            <label for="tipom" class="check radiobtn">Mensagem</label>
                            <input type="radio" name="tipo_contato" value="Orçamento" id="tipoo" checked="checked" class="check">
                            <label for="tipoo" class="check radiobtn">Orçamento</label>
                            
                            <div class="form_serv active">

                                <label for="tipo_servico"><p>Selecione o tipo de Serviço:</p></label>
                                <select class="campo" name="tiposerv">
                                    <option value="Tipo1" selected="selected">Demolição em geral</option>
                                    <option value="Tipo2">Desmontagem de galpão</option>
                                    <option value="Tipo3">Britagem de concreto</option>
                                    <option value="Tipo4">Demolição controlada</option>
                                    <option value="Tipo5">Terraplenagem</option>
                                    <option value="Tipo6">Remoção de entulho</option>
                                </select>   

                                <label for="details" class="nowidth"><p>Descrever no quadro abaixo detalhes dos serviços a serem executados*:</p></label><br>
                                <textarea name="details" id="details" required></textarea><br>

                                <label for="duvidas" class="nowidth"><p>Coloque suas dúvidas neste quadro:</p></label><br>
                                <textarea name="duvidas" id="duvidas"></textarea><br>

                            </div>

                            <div class="form_msg">

                                <label for="msg"><p>Mensagem:</p></label><br>
                                <textarea name="msg" id="msg" placeholder="Digite sua Mensagem" ></textarea>

                            </div>

                            <input class="send_btn" id="send" type="submit" value="Enviar" />
                            <div class="aguarde"><img src="images/form-loading.gif"></div>

                        </form>
                        <div id="form-messages"></div>
                    </div><!--formulario-->

                    <div class="local">
                        <div class="localizacao">
                            <h2>Localização</h2>
                        <div class="local sprite"></div>
                        <div class="tel sprite"></div>
                        <p>
                            Av. Piraporinha, 1855
                            <br>CEP: 09951-444 - Piraporinha
                            <br>Diadema / SP
                        </p>

                        <p>
                            (11) 4067-1847
                        </p>
                        <div class="mail sprite"></div>
                        <a href="mailto:contato@demolidoratratofeito.com.br?Subject=Contato">Mande-nos um e-mail</a>
                        </div>
                        <div class="mapagoogle">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3653.5703530422693!2d-46.5857744!3d-23.6913181!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce4385075a64c3%3A0xa439c11fc53f9031!2sAv.+Piraporinha%2C+1855+-+Vila+Nogueira%2C+Diadema+-+SP%2C+Rep%C3%BAblica+Federativa+do+Brasil!5e0!3m2!1spt-BR!2sus!4v1409160763651" width="350" height="355" frameborder="0" style="border:0"></iframe>
                        </div>
                    </div>

                </div>
            </div>

<?php include_once('footer.php'); ?>