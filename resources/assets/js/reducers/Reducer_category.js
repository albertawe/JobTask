import { FETCH_CATEGORY } from "../actions/index";

export default function(state = [], action) {
  switch (action.type) {
    case FETCH_CATEGORY:
      return [action.payload.data, ...state];
  }
  return state;
}
