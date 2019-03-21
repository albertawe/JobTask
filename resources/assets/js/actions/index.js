import axios from "axios";

//const API_KEY = "6a78596d062df78380eff5944c4e5567";
//const ROOT_URL = `http://api.openweathermap.org/data/2.5/forecast?appid=${API_KEY}`;
const ROOT_URL = 'http://127.0.0.1:8000/api';

export const FETCH_JOBPOST = "FETCH_JOBPOST";
export const FETCH_JOBPOSTBYPAGE = "FETCH_JOBPOSTBYPAGE";
export const FETCH_MESSAGE = "FETCH_MESSAGE";
export const RESET_ACTION = "RESET_ACTION";
export const FETCH_CATEGORY = "FETCH_CATEGORY";
export const POST_MESSAGE = "POST_MESSAGE";
export const START_LOAD = "START_LOAD";
export const STOP_LOAD = "STOP_LOAD";

export function reset(){
  return {
    type: RESET_ACTION
  }
}

export function fetchmessage(term){
  const url = `${ROOT_URL}/messages/${term}`;
  const request = axios.get(url);
  return {
    type: FETCH_MESSAGE,
    payload: request
  };
}

export function PostMessage(datauser,values) {
  const request = axios
    .post(`${ROOT_URL}/newmessage/${datauser}`, values);

  return {
    type: POST_MESSAGE,
    payload: request
  };
}

export function fetchjobbypage(page) {
  const url = page;
  const request = axios.get(url);
  return {
    type: FETCH_JOBPOSTBYPAGE,
    payload: request
  };
}

export function fetchjobpost(term) {
  const url = `${ROOT_URL}/job_post/${term}`;
  const request = axios.get(url);
  return {
    type: FETCH_JOBPOST,
    payload: request
  };
}

export function fetchjobcategory() {
  const url = `${ROOT_URL}/category`;
  const request = axios.get(url);
  return {
    type: FETCH_CATEGORY,
    payload: request
  };
}

export function startload(){
  return{
    type: START_LOAD
  }
}

export function stopload(){
  return{
    type: STOP_LOAD
  }
}