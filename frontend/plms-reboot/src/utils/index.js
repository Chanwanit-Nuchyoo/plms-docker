import moment from "moment";

export const getClassNames = (classes, ...classNames) => classNames.map(className => classes[className]).join(' ')
export const buttonStyle = { height: "100%", color: "white" };

export const SemesterOptions = new Set(["1", "2"])
export const ClassDateOptions = new Set(["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"])

export const modalStyle = {
  position: 'absolute',
  top: '50%',
  left: '50%',
  transform: 'translate(-50%, -50%)',
  minWidth: "600px",
  width: "fit-content",
  bgcolor: 'rgba(25,44,91,0.7)',
  backdropFilter: 'blur(25px)',
  borderRadius: "16px",
  border: '1px solid rgba(255, 255, 255, 0.20)',
  boxShadow: 24,
  p: 4,
};

export const checkIsAccessible = (type, currentTime, startTime, endTime) => {
  if (type === "always" || type === "timer-paused") {
    return true
  } else if (type === "timer" || type === "datetime") {
    if (currentTime.isBetween(startTime, endTime)) {
      return true
    } else {
      return false
    }
  }
}

export const statusProperties = {
  "accepted": {
    message: "Accepted",
    color: "#4CAF50"
  },
  "wrong_answer": {
    message: "Wrong Answer",
    color: "#F44336"
  },
  "pending": {
    message: "Pending",
    color: "#607D8B"
  },
  "constraint_failed": {
    message: "Constraint Failed",
    color: "#9C27B0"
  },
  "error": {
    message: "Error",
    color: "#FF5722"
  },
  "rejected": {
    message: "Rejected",
    color: "#FF5722"
  }
}

export const markingBgColor = {
  0: {
    bgcolor: "var(--raven)",
    color: "white"
  },
  1: {
    bgcolor: "#FFEB3B",
    color: "black"
  },
  2: {
    bgcolor: "#4CAF50",
    color: "white"
  },
}

export const getConstraintsFailedMessage = (response_body) => {
  let message = "";
  if (response_body.status === "failed") {
    message = "Category".padEnd(25) + "Keywords\n" + "-".repeat(40) + "\n";
    let failed = {
      "classes": [],
      "imports": [],
      "methods": [],
      "functions": [],
      "variables": [],
      "reserved_words": [],
    }

    for (const [key, value] of Object.entries(response_body.keyword_constraint)) {
      if (Array.isArray(value) && value.length > 0) {
        const kwFailedList = value.filter(kw => !kw.is_passed).map(kw => kw.keyword);
        failed[key].push(...kwFailedList)
      }
    }

    for (const [key, value] of Object.entries(failed)) {
      if (value.length > 0) {
        message += `${key.padEnd(25)} ${value.join(", ")}\n`;
      }
    }

  } else if (response_body.status === "error") {
    message = response_body.message;
  } else {
    message = response_body.message;
  }

  return message;
}

export function secondsToDhms(seconds) {
  seconds = Number(seconds);
  const d = Math.floor(seconds / (3600 * 24));
  const h = Math.floor(seconds % (3600 * 24) / 3600);
  const m = Math.floor(seconds % 3600 / 60);
  const s = Math.floor(seconds % 60);

  const dDisplay = d > 0 ? d.toString().padStart(2, '0') : '00';
  const hDisplay = h > 0 ? h.toString().padStart(2, '0') : '00';
  const mDisplay = m > 0 ? m.toString().padStart(2, '0') : '00';
  const sDisplay = s > 0 ? s.toString().padStart(2, '0') : '00';
  return { d: dDisplay, h: hDisplay, m: mDisplay, s: sDisplay };
}

export const checkExamFlag = (chapter, serverTimeOffset) => {
  if (["always", "timer-paused"].includes(chapter.allow_access_type)) {
    return true;
  } else if (chapter.allow_access_type === "deny") {
    return false;
  } else {
    const now = moment().add(serverTimeOffset, "milliseconds");
    const start = moment(chapter.access_time_start);
    const end = moment(chapter.access_time_end);
    return now.isBetween(start, end);
  }
};