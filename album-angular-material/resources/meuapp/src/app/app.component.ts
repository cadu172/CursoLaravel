import { Component } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { Post } from './post';
import { PostDialogComponent } from './post-dialog/post-dialog.component';

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

  constructor(public dialog: MatDialog) {

  }

  openDialog() {
    
    const dialogRef = this.dialog.open(PostDialogComponent, {
      width: '400px'
    });

    dialogRef.afterClosed().subscribe(result => {
      if ( result ) {
        console.log(result);
      }
    });    

  }
}
