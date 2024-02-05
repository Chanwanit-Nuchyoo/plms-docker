/* eslint-disable react/prop-types */
import { Box, Button, Stack, Skeleton } from "@mui/material";
import { buttonStyle } from "@/utils";

const buttonStyleExtended = { ...buttonStyle, minHeight: "36px" };
const buttons = [
  { label: "Avatar", boxProps: { width: 130 } },
  { label: "Student ID", boxProps: { width: 150 } },
  { label: "Name", boxProps: { width: 250 } },
]

const defaultBoxProps = { width: 85 }
const commonStackStyle = {
  position: "sticky",
  bgcolor: "var(--ebony)",
  zIndex: "10",
}
const TableHeadButton = ({ label, boxProps }) => (
  <Box {...boxProps} className="table-head-column">
    <Button fullWidth sx={{ ...buttonStyleExtended, pointerEvents: "none" }} >{label}</Button>
  </Box>
)
const StudentListTableHead = ({ isLoading, labInfo }) => {

  return (
    <>
      <Stack direction="row" spacing="5px" width="fit-content" sx={{ ...commonStackStyle, top: "0px" }} >
        <Stack direction="row" spacing="5px" sx={{ ...commonStackStyle, left: "0px" }} >
          {buttons.map((button, index) => (
            <TableHeadButton key={index} {...button} />
          ))}
        </Stack>
        {isLoading && Array.from({ length: 11 }).map((_, index) => (
          <Skeleton key={index} variant="rounded" width={85} height={38.5} animation="wave" />
        ))}
        {!isLoading && labInfo.map((lab, index) => (
          <TableHeadButton key={index} label={`Lab ${index + 1}\n(${lab.chapter_fullmark})`} boxProps={defaultBoxProps} />
        ))}
        {!isLoading && (
          <TableHeadButton label="Total" boxProps={defaultBoxProps} />
        )}
      </Stack>

      {isLoading && Array.from({ length: 4 }).map((_, index) => (
        <Skeleton key={index} variant="rounded" width={1520} height={120} />
      ))}
    </>
  );
};

export default StudentListTableHead