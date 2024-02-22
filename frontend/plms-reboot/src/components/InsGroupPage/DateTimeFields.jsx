/* eslint-disable react/prop-types */
import { Stack } from '@mui/material'
import { DateTimeField } from '@mui/x-date-pickers'
import { Controller } from 'react-hook-form'
import moment from 'moment';
import { DateTimePicker } from '@mui/x-date-pickers/DateTimePicker';

const DateTimeFields = ({ prefix, control }) => {
  return (
    <Stack direction="row" spacing={"10px"} alignItems="center">
      <Controller
        name={`${prefix}_time_start`}
        control={control}
        defaultValue={moment().startOf('minute')}
        render={({ field }) => (
          <DateTimePicker
            label="Start date"
            size='small'
            format="YYYY-MM-DD HH:mm"
            value={field.value}
            onChange={field.onChange}
          />
        )}
      />

      <Controller
        name={`${prefix}_time_end`}
        control={control}
        defaultValue={moment().startOf('minute')}
        render={({ field }) => (
          <DateTimePicker
            label="End date"
            size='small'
            format="YYYY-MM-DD HH:mm"
            value={field.value}
            onChange={field.onChange}
          />
        )}
      />
    </Stack>
  )
}

export default DateTimeFields