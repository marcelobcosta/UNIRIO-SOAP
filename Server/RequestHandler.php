<?php
namespace SOAP\Server;

use SOAP\Model\Author;
use SOAP\Model\Mock;
use SOAP\Model\Publication;

class RequestHandler
{

    public function teste() {
        return Mock::publications()->toJson();
    }

    public function exercicio1($title) {
        $result = Mock::publications()->filter(function ($item) use($title){
            if($item->title == $title){
                return $item;
            }
        });

        return $result->toArray();
    }

    public function createPublication($title, $initialPage, $finalPage, $publicationDate,$authors = [])
    {
        $publication = Publication::create([
            'titulo' => $title,
            'paginaInicial' => $initialPage,
            'paginaFinal' => $finalPage,
            'dataPublicacao' => $publicationDate
        ]);

        $publication->authors()->sync($authors);

        return $publication->id;
    }

    public function updatePublication($id,$title, $initialPage, $finalPage, $publicationDate, $authors = [])
    {
        $publication = Publication::find($id);

        $publication->upate([
            'titulo' => $title,
            'paginaInicial' => $initialPage,
            'paginaFinal' => $finalPage,
            'dataPublicacao' => $publicationDate
        ]);

        $publication->authors()->sync($authors);
    }

    public function retrievePublication($id)
    {
        $publication = Publication::find($id);

        return $publication->toArray();
    }

    public function deletePublication($id)
    {
        $publication = Publication::find($id);

        $publication->delete();
    }

    public function createAuthor($name,$citationName,$cpf,$cep)
    {
        $soap_client = new \SoapClient('https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');

        $address_data = $soap_client->__soapCall('consultaCEP',[
            [
                'cep' => $cep
            ]
        ]);

        $author =  Author::create([
            'nome' => $name,
            'nomeDeCitacao' => $citationName,
            'cpf' => $cpf,
            'cep' => $cep,
            'state' => $address_data->uf,
            'city' => $address_data->cidade,
            'neighborhood' => $address_data->bairro,
            'address' => $address_data->end
        ]);

        return $author->id;
    }

    public function retrieveAuthor($id)
    {
        $author = Author::find($id);

        return $author->toArray();
    }

    public function updateAuthor($id, $name,$citationName,$cpf,$cep)
    {
        $soap_client = new \SoapClient('https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');

        $address_data = $soap_client->__soapCall('consultaCEP',[
            [
                'cep' => $cep
            ]
        ]);

        $author = Author::find($id);

        $author->update([
            'nome' => $name,
            'nomeDeCitacao' => $citationName,
            'cpf' => $cpf,
            'cep' => $cep,
            'state' => $address_data->uf,
            'city' => $address_data->cidade,
            'neighborhood' => $address_data->bairro,
            'address' => $address_data->end
        ]);
    }

    public function deleteAuthor($id)
    {
        $author = Author::find($id);

        $author->delete();
    }

    public function consultaCep($cep)
    {
        $soap_client = new \SoapClient('https://apps.correios.com.br/SigepMasterJPA/AtendeClienteService/AtendeCliente?wsdl');

        $data = [
            [
                'cep' => $cep
            ]
        ];

        $return = $soap_client->__soapCall('consultaCEP',$data);

        return $return;
    }
}