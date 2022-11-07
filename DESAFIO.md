# Teste Full-Stack

Leia primeiro todo o projeto

Quando finalizar o teste, publique tudo no seu Github, BitBucket ou nos envie o projeto zipado para os emails em que você recebeu.

## Missão backend

Desenvolver uma **API JSON RESTful** em **PHP**, que utilize todos os métodos (`GET`, `POST`, `PUT`, `DELETE`).

Se preferir, utilize algum framework PHP que você sinta mais facilidade: **Laravel**, **Lumen**, **Zend**, **Zend Expressive**, **CakePHP** etc.

### Especificação

Monte uma base de veículos com a seguinte estrutura:

```
id:		    integer
veiculo:   	string
marca:     	string
ano:       	integer
descricao: 	text
vendido:   	bool
created:   	datetime
updated:   	datetime
```

Utilize **MongoDB** ou **MySQL** para armazenar os dados que a **API** irá consumir.

### API endpoints

`GET /veiculos`

Retorna todos os veículos

---

`GET /veiculos/find`

Retorna os veículos de acordo com o termo passado parâmetro `q` (URL: /veiculos/find?q="termo buscado")

---

`GET /veiculos/{:id}`

Retorna os detalhes do veículo

---

`POST /veiculos`

Adiciona um novo veículo

---

`PUT /veiculos/{:id}`

Atualiza os dados de um veículo

---

`DELETE /veiculos/{:id}`

Apaga o veículo


## Missão frontend

Desenvolver uma **UI (User Interface)** conforme especificação abaixo. O layout é livre. Mas lembre-se, ela deve ser responsiva.

### Especificação

- Consumir **API** criada acima
- Usar algum framework Javascript (Angular, por exemplo) será um Bônus :star:
- Criar uma tela que tenha:
    - Listagem de veículos
    - Detalhe do veículo
    - Busca
    - Formulário de novo/edição de veículos

### Dica

Utilize algum framework para auxiliar no desenvolvimento da interface, por exemplo, Bootstrap.


### Dúvidas

Qualquer dúvida, nos envie um email para contato@dcide.com.br com o assunto `[Teste Full-Stack PHP] Dúvida - <SEU NOME>`
