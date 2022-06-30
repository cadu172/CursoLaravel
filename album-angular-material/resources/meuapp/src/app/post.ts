export class Post {
  constructor (
    public nome : string,
    public titulo : string,
    public subtitulo : string,
    public email : string,
    public mensagem : string,
    // parametros opcionais
    public arquivo? : string,
    public id? : number,
    public likes? : number
  ) {}
}
