interface User{
  name: string,
  age: number,
  email: string,
  password: string,
  gender?: string,
}

function user1(obj: User): void{ }

user1({
  name: 'Ashraf',
  age: 10,
  email: 'ashraf@23gmail.com',
  password: 'hamira',
})