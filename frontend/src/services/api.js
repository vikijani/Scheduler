import api from "@/config/axios";

export const formService = {
  send(data){
    return api.post('form', data)
  }
}
