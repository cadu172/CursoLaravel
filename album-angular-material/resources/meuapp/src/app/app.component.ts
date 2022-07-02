import { Component } from '@angular/core';
import { Post } from './post';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  title = 'meuapp';
  public posts: Post[] = [
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card"),
    new Post("Carlos Eduardo","Cachorro Shiba","Cachorro Do Filme","cadu172@gmail.com","Estou fazendo o teste do texto que vai na mensagem do card")
  ];
}
